weather-printer
===============

Code to get the weather printing!

generate_image contains the code to:
* Grab weather information from the open weather map api
* Convert that data to html using the twitter bootstrap framework
* Use Climacons weather font to display weather conditions
* Convert that page into an image using wkhtmltopdf
* Use imagemagick to convert that image to a 2bit black and white bmp
* Send that image to the browser using headers

elecric_imp contains the code to:
* Grab the generated image from the server
* Loop through that image data, sending it over the serial port to the printer

Refer to the project page for more details - <a href="https://www.cambridgehackspace.com/wiki/weather-printer/">Weather Printer</a>
