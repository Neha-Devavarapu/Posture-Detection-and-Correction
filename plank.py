import cv2
import mediapipe as mp

mp_drawing = mp.solutions.drawing_utils
mp_pose = mp.solutions.pose

# Initialize webcam
cap = cv2.VideoCapture(0)

# Create window to display video stream
cv2.namedWindow("Plank Posture Correction", cv2.WINDOW_NORMAL)


# Define ergonomics bar parameters
ERGONOMICS_BAR_LENGTH = 200
ERGONOMICS_BAR_HEIGHT = 20
ERGONOMICS_BAR_COLOR = (255, 255,255) 
ERGONOMICS_BAR_MARGIN = 10
ERGONOMICS_BAR_START = (ERGONOMICS_BAR_MARGIN, ERGONOMICS_BAR_MARGIN)
ERGONOMICS_BAR_END = (ERGONOMICS_BAR_MARGIN + ERGONOMICS_BAR_LENGTH, ERGONOMICS_BAR_MARGIN + ERGONOMICS_BAR_HEIGHT)

# Initialize ergonomics bar position and value
ERGONOMICS_BAR_POS = ERGONOMICS_BAR_START
ERGONOMICS_BAR_VALUE = 0.5

while True:
    # Read frame from webcam
    ret, image = cap.read()
    if not ret:
        break
    
    # Flip the image horizontally for natural movement perception
    image = cv2.flip(image, 1)
    
    # Convert image to RGB format
    image_rgb = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
    
    # Detect pose landmarks in image
    with mp_pose.Pose(min_detection_confidence=0.5, min_tracking_confidence=0.5) as pose:
        results = pose.process(image_rgb)
        
        # Draw landmarks on image
        mp_drawing.draw_landmarks(image, results.pose_landmarks, mp_pose.POSE_CONNECTIONS)
        
        # Calculate ergonomics value based on pose landmarks
        if results.pose_landmarks:
            left_shoulder = results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_SHOULDER].y
            right_shoulder = results.pose_landmarks.landmark[mp_pose.PoseLandmark.RIGHT_SHOULDER].y
            hips = (results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_HIP].y + 
                    results.pose_landmarks.landmark[mp_pose.PoseLandmark.RIGHT_HIP].y) / 2
            ergonomics_value = (hips - (left_shoulder + right_shoulder) / 2) / (hips * 2)
            ERGONOMICS_BAR_VALUE = max(0, min(1, (ergonomics_value + 1) / 2))  # restrict value to [0, 1]

        # Change ergonomics bar color based on ergonomics value
            if ergonomics_value >= -0.05 and ergonomics_value <= 0.05:
                ERGONOMICS_BAR_COLOR = (0, 255, 0)  # green
                cv2.putText(image, "             Plank posture: Correct", (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2)
            else:
                ERGONOMICS_BAR_COLOR = (0, 0, 255)  # red
                cv2.putText(image, "             Plank posture: Incorrect", (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 0, 255), 2)
        
        # Draw ergonomics bar on image
        ergonomics_bar_pos = (ERGONOMICS_BAR_START[0] + int(ERGONOMICS_BAR_VALUE * ERGONOMICS_BAR_LENGTH), 
                              ERGONOMICS_BAR_START[1] + ERGONOMICS_BAR_HEIGHT)
        cv2.rectangle(image, ERGONOMICS_BAR_START, ERGONOMICS_BAR_END, ERGONOMICS_BAR_COLOR, -1)
        cv2.line(image, ERGONOMICS_BAR_START, ergonomics_bar_pos, (255, 255, 255), 2)
    
    # Display image in window
    cv2.imshow("Plank Posture Correction", image)
    
    # Check for keyboard input
    key = cv2.waitKey(1) & 0xFF   
    # Exit program when "q" key is pressed
    if cv2.waitKey(1) & 0xFF == ord("q"):
        break  