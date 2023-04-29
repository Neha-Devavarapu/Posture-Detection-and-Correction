import cv2
import mediapipe as mp

# Set up MediaPipe Pose for keypoint detection
mp_drawing = mp.solutions.drawing_utils
mp_pose = mp.solutions.pose
pose = mp_pose.Pose()

# Initialize video capture
cap = cv2.VideoCapture(0)

# Define posture thresholds and counters
UPRIGHT_THRESHOLD = 0.85
BENT_THRESHOLD = 0.15
upright_counter = 0
bent_counter = 0

# Define colors for posture feedback
GREEN = (0, 255, 0)
RED = (0, 0, 255)
color=(255,255,255)

while True:
    # Read frame from video capture
    ret, frame = cap.read()

    # Set the frame color to full color
    frame = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    
    # Convert frame to RGB for processing with MediaPipe Pose
    frame = cv2.cvtColor(frame, cv2.COLOR_RGB2BGR)

    # Process frame with MediaPipe Pose
    results = pose.process(frame)

    # Draw keypoints on frame
    mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS)
    posture_message=""
    # Check posture by comparing y-coordinate of hip and knee keypoints
    if results.pose_landmarks is not None:
        hip_y = results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_HIP].y
        knee_y = results.pose_landmarks.landmark[mp_pose.PoseLandmark.LEFT_KNEE].y
        if hip_y < knee_y:
            posture_message = "Incorrect posture"
            bent_counter += 1
            upright_counter = 0
            color = RED
            if bent_counter >= BENT_THRESHOLD:
                # Correct posture by raising hips
                # Insert your own corrective action here
                bent_counter = 0
        else:
            posture_message = "Correct posture"
            upright_counter += 1
            bent_counter = 0
            color = GREEN
            if upright_counter >= UPRIGHT_THRESHOLD:
                upright_counter = 0

    # Display posture feedback message and frame
    cv2.putText(frame, posture_message, (50, 50), cv2.FONT_HERSHEY_SIMPLEX, 1, color, 2, cv2.LINE_AA)
    cv2.imshow("Squat Posture Corrector", frame)

    # Exit program when "q" key is pressed
    if cv2.waitKey(1) & 0xFF == ord("q"):
        break

# Release video capture and destroy window
cap.release()
cv2.destroyAllWindows()