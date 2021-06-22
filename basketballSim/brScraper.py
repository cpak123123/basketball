# -*- coding: utf-8 -*-
"""
Created on Sun Jun 13 01:00:24 2021

@author: cpak1
"""
import urllib.request
import pandas as pd
from bs4 import BeautifulSoup
class Scraper():
        '''
        Class for scraping information off of basketball-reference
        '''
        def __init__(self):
                self.teams_df = self.all_teams()
                
        def nav_link(self, link):
                req_url = urllib.request.urlopen(link)
                site = req_url.read()
                soup = BeautifulSoup(site, 'html.parser') 
                return soup
        def get_player_link(self, search):           
                search = search.replace(" ", "+")
                link = "https://www.basketball-reference.com/search/search.fcgi?search=" + search
                soup = self.nav_link(link) 
                exten = soup.find_all("div", {"class": "search-item-name"})[0].a["href"]
                return "https://www.basketball-reference.com" + exten
        def all_teams(self):
                teams_link = "https://www.basketball-reference.com/teams/"
                soup = self.nav_link(teams_link)
                teams_df = pd.DataFrame(columns = ["team_name", "team_link", "init"])
                for each in soup.find("table", id = "teams_active").find_all("tr", {"class": "full_table"}):
                        teams_map = {}
                        team = each.a
                        teams_map["team_name"] = team.get_text()
                        teams_map["team_link"] = "https://www.basketball-reference.com" + team["href"]
                        teams_map["init"] = team["href"][-4:-1]
                        teams_df = teams_df.append(teams_map, ignore_index = True)
                return teams_df
        def get_team_link(self, team_name):
                '''
                Can use initials or full team name to get team br page
                '''
                if len(team_name) == 3:
                        return self.teams_df[self.teams_df["init"] == team_name]["team_link"].item()
                else:
                        return self.teams_df[self.teams_df["team_name"] == team_name]["team_link"].item()
        def get_roster(self, team_name, season):
                team_link = self.get_team_link(team_name)
                if type(season) == int or len(season) == 4:
                        team_link = team_link + str(season) + ".html"
                elif len(season) == 9:
                        team_link == team_link + season.split("-")[1] + ".html"
                soup = self.nav_link(team_link)
                roster_df = pd.DataFrame(columns = ["team_name", "player_link", "player_name"])
                for member in soup.find("table", id = "roster").find_all("tr"):
                        player_map = {}
                        player = member.a
                        if player == None:
                                continue
                        player_map["team_name"] = team_name
                        player_map["player_link"] = "https://www.basketball-reference.com" + player["href"]
                        player_map["player_name"] = player.get_text()
                        roster_df = roster_df.append(player_map, ignore_index = True)   
                return roster_df
        def get_base_stats(self, player, season):
                #Get essential statline given a player and roster in a given year
                link = self.get_player_link(player)
                soup = self.nav_link(link)
                base_info = ["team_id", "pos", "pts_per_g", "tov_per_g", "ast_per_g", "trb_per_g", "stl_per_g", "blk_per_g"]
                stat_map = {}
                stat_map["name"] = soup.find("h1", itemprop = "name").find("span").get_text()
                stat_map["year"] = season
                for stat in soup.find("table", id = "per_game").find("tr", id = "per_game."+str(season)):
                        if stat["data-stat"] in base_info:
                                stat_map[stat["data-stat"]] = [stat.get_text()]
                return pd.DataFrame(stat_map)
        def get_szn_games(self, team, season):
                team_link = self.get_team_link(team)
                sched_link = team_link + str(season) + "_games" + ".html"
                soup = self.nav_link(sched_link)
                game_links = []
                for game in soup.find("table", id = "games").find_all("tr"):
                        oppo = game.find("td", {"data-stat": "opp_name"})
                        if oppo == None:
                                continue
                        box = game.find("td", {"data-stat": "box_score_text"})
                        game_links.append(box.a["href"])
                return game_links
        def get_game_vs(self, team1, team2, season):
                #????
                team_link = self.get_team_link(team1)
                sched_link = team_link + str(season) + "_games" + ".html"
                soup = self.nav_link(sched_link)
                game_links = []
                for game in soup.find("table", id = "games").find_all("tr"):
                        oppo = game.find("td", {"data-stat": "opp_name"})
                        if oppo == None:
                                continue
                        if oppo.get_text() == team2 or oppo.a["href"][-4:-1] == team2:
                                box = game.find("td", {"data-stat": "box_score_text"})
                                game_links.append(box.a["href"])
                        '''
                        if game["href"][-4:-1] == team2 or game.get_text() == team2:
                                game_links.append(game["href"])
                        '''
                return game_links

