import cv2
import os

def remove_background(folder_path, output_folder):
    # Create output folder if it doesn't exist
    if not os.path.exists(output_folder):
        os.makedirs(output_folder)

    # Get a list of all files in the folder
    files = os.listdir(folder_path)

    # Process each image in the folder
    for file in files:
        # Check if the file is an image
        if file.endswith('.jpg') or file.endswith('.png'):
            # Read the image
            image_path = os.path.join(folder_path, file)
            image = cv2.imread(image_path)

            # Convert the image to grayscale
            gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

            # Apply a threshold to create a mask
            _, mask = cv2.threshold(gray, 1, 255, cv2.THRESH_BINARY)

            # Apply the mask to the image
            foreground = cv2.bitwise_and(image, image, mask=mask)

            # Save the background-removed image
            output_path = os.path.join(output_folder, file)
            cv2.imwrite(output_path, foreground)

            print(f"Background removed: {file}")

    print("Background removal complete!")

# Specify the folder containing the images
input_folder = "path/to/input/folder"

# Specify the output folder to save the background-removed images
output_folder = "path/to/output/folder"

# Call the function to remove the background
remove_background(input_folder, output_folder)