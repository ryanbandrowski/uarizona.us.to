/**
* APCV 498 Senior Capstone - Spring 2023
* Virtual Tour: Historic Places & Structures
* Team: Virtoural Solutions
* Members: Ryan Robling, Emeral Bismaputra, Pedro Andree Briceno-Villegas, Carlos Gastelum
* Professor: Henry Werchan
**/

With more than one neighborhood, our plan was the following:

Rotate a different featured neighborhood every time a user opens up the homepage.

Based on the neighborhood displaying at the homepage, inside a sidebar, show a location map of the neighborhood, and optionally offer the opportunity to not only look at historic buildings,
but also eating and hospitality options at that specific neighborhood. This sidebar should also offer a link to a list of other neighborhoods with historic buildings.

Below the featured neighborhood and its sidebar, a section named Near Sites will display three (3) different buildings that belong to the featured neighborhood.
If a neighborhood has more than three (3) historic buildings, this section should display them randomly.

Once inside the inner page of a neighborhood, it will display information and images about it. Inside a sidebar, a list of all its historic buildings and the option for the user to perform a search.

Every historic building will have its own inner page with information and images about it, and a link to its map location. This link could eventually be replaced with an embedded location map similar
to the one displaying in the homepage.


### Adding New Neighborhoods and Places of Interest ###

The website is built using PHP files that will dynamically generate new pages for neighborhood info and place of interest info pages

In the base uarizona.us.to directory, there are /hoods and /assets directories, these are what the PHP files pull from.

In /hoods there is a directory for each neighborhood.
To add another, create a new folder with an info.txt file inside.

info.txt will contain several variables, here's an example. The img variables refer to
sites within the neighborhood how their name appears with the directory and its images. By
calling the site name variable, it's image will be used on the neighborhood landing page.
The 3 p's are 3 paragraphs of text that will be broken up by images as seen on the site.
	Neighborhood: West University
	img-1: baptist-church
	img-2: law-offices
	img-3: drachman-house
	p1: text
	p2: text
	p3: text

Also inside of the individual hood directory will be a /sites directory.

/sites will have a text file for each point of interest in the neighborhood.
for example, baptist-church.txt

The format for the site text file is as follows:
	Site:
	Description:
	Statement of Significance:
	Physical Description:
	Location:
	Owner:
	Style or Cultural Period:
	Map:
Map is a link to the address in Google Maps. To generate new links, enter your site's address
in Google Maps, adjust the map if you'd like, then copy the link in the url bar.

For images, we will be using the /assets directory.

/assets/img/hoods/ is where we store the images for the points of interest.
There will be a directory for each neighborhood with an image for each site inside.
The image will be named with the same variable as used everywhere else like baptist-church, for example.





