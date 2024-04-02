[<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Intel_logo_%282020%2C_light_blue%29.svg/300px-Intel_logo_%282020%2C_light_blue%29.svg.png" width="50">](https://www.intel.com/)
[<img src="https://www.intel.com/content/dam/develop/public/us/en/images/admin/oneapi-logo-rev-4x3-rwd.png" width="50">](https://www.intel.com/)
[<img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/Java-logo.png" width="50">](https://www.java.com/)
[![React](https://img.shields.io/badge/React-%2300D8FF.svg?style=flat&logo=react&logoColor=white)](https://reactjs.org/)
<img src="https://upload.wikimedia.org/wikipedia/commons/6/61/HTML5_logo_and_wordmark.svg" width="50">
[![Jupyter Notebook](https://img.shields.io/badge/Jupyter%20Notebook-%23F37626.svg?style=flat&logo=jupyter&logoColor=white)](https://jupyter.org/)

# Smart Car-App: Car Parking Reservation Facility and Service provider Locator
✨🚘🚔 A prototype of a parking reservation app that implements smart booking of parking slots and other features like identifying car service stations and charging dock locators for electric cars ✨🚘🚔

# Contents
1. [Car Parking Reservation System 🚗🅿](#Car-Parking-Reseravtion-System)
   
	(a) Parking Space identifier

	(b) Reservation portal layout

	(c) Tools utilised and Performance metric

2. Service station and Electric Dock Chargers Locator
   
	(a) Map services used

	(b) Dedicated communication portals

<a name="Car-Parking-Reseravtion-System"></a>
# Car-Parking-Reservation-System 🚗🅿
## Parking Space identifier:
From a parking space layout, the spaces available for parking are selected. The code is divided into two segments: **Parking space picker** and **Parking space counter**.
### Parking Space picker:  

+ The pickle library converts Python objects to a byte stream for storage and deserialization. 

+ Initially a rectangle of dimension 107 x 48 pixels is defined to pick the parking space from the given camera footage. [The selected dimensions are for the considered footage] 

+ Based on the type of footage available from different locations, appropriate dimensions can be set. 

+ The image of the layout is loaded into the code. The rectangle declared previously is utilised to select the parking space in the layout by simply clicking (Left Mouse Button) the spaces. 

+ If a parking space is incorrectly selected, the rectangle can be deselected by clicking it by Right Mouse Button.     

+ The selected parking spaces are loaded into a list as coordinates into a “.txt” file named “CarParkPos.txt” in binary reading mode. From the pickle library, the function pickle.load() deserializes the data into a Python list.
  
+ The program keeps running in a loop. This loop continuously displays the car park image (carParkImg.png) and handles mouse interactions on the image window to continuously list and store the spaces.

![generated image](materials/parkingsysimg1.jpeg)

The image depicts the output of the Parking space picker code. The rectangles are placed in the parking space by selecting them through Mouse clicks. 

## Parking Space counter:

+ The video processing is done from a pre-recorded footage of a parking space layout. OpenCV and CVZone libraries are used for image and video processing.  

+ From the image generated from the Parking Space picker code, this code identifies free parking spaces by measuring the intensities of the selected parking spaces. From all the spaces, the median of the intensities of the spaces is taken as the threshold to classify them into free and occupied.  

+ The code performs grayscale conversion, applies gaussian and median blur for noise reduction of the image and adaptive thresholding for foreground and background distinction. The program waits for 10 milli seconds before processing the next frame. 

+ Converting each frame to grayscale significantly reduces the amount of data processed, leading to faster processing speeds and potentially enabling real-time video analysis 

+ The Gaussian blur is a type of image-blurring filter that uses a Gaussian function for calculating the transformation to apply to each pixel in the image. 

+ The Median blur operation is similar to the other averaging methods. Here, the central element of the image is replaced by the median of all the pixels in the kernel area. This operation processes the edges while removing the noise. 
