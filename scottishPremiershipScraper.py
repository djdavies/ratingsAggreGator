# -*- coding: utf-8 -*-

# both for scraping
import requests
from bs4 import BeautifulSoup
# just for console output - not needed in production
import sys
import json
# outputs the json to a txt file
import io
# pretty prints out json
from pprint import pprint

def specialPrint(str):
	'''
	Function written because of
	stduout encoding for non-UTF8 console...
	see: 
	http://stackoverflow.com/questions/16346914/python-3-2-unicodeencodeerror-charmap-codec-cant-encode-character-u2013-i
	'''
	print str.encode(sys.stdout.encoding, errors='replace')

teamToFetch = {
	u"Aberdeen":"aberdeen",
	u"Celtic":"celtic",
	u"Dundee":"dundee",
	u"Dundee United":"dundeeutd",
	u"Hamilton Academical":"hamilton",
	u"Inverness Caledonian Thistle":"invernessct",
	u"Kilmarnock":"kilmarn",
	u"Motherwell":"mother",
	u"Partick Thistle":"partick",
	u"Ross County":"ross",
	u"St Johnstone":"stjohnst",
	u"St Mirren":"stmirren"
}

data = []

for key in teamToFetch:	
	# fetches next URL to scrape via teamToFetch dictionary
	url = "http://www.footballsquads.co.uk/scots/2014-2015/scotprm/" + teamToFetch[key] + ".htm"
	r = requests.get(url)
	soup = BeautifulSoup(r.content)
	rows = soup.find_all("tr")
	team = teamToFetch[key]

	# naming cols from the page, for a player
	cols = ["number", "name", "nat", "pos", 
	"height", "weight", "dob", "birth", "prevClub", "team"]

	# holds player dictionaries 
	# i.e. list of player dicts
	players = []

	for row in rows:
		player = {}
		colIndex = 0

		# find all td elements
		for cell in row.find_all("td"):
			#row = [row.text.encode(sys.stdout.encoding, errors='replace')]
			# each column in row, add data to player dict
			player[cols[colIndex]] = cell.text
			player[cols[9]] = teamToFetch[key]  	
			# increment colIndex so we can iterate through
			# my named columns in cols
			colIndex+=1

		# add player object into players array
		# (players array of objects player)	
		players.append(player)

	# add team to json, perhaps not needed in our data structure
	team = {"name":key,"players":players}
	data.append(team)	

# write all the data to json and out to file
# nb: utf-8 support
with io.open('app/storage/scottishPremiership.json', 'w', encoding='utf-8') as f:
	f.write(unicode(json.dumps(data, ensure_ascii=False, sort_keys=True, indent=4)))

# read the json/txt file, pprint (pretty print) for console output
json_data=open('app/storage/scottishPremiership.json')

data = json.load(json_data)
pprint(data)
json_data.close()