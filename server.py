from flask import Flask, request, jsonify
import face_recognition

app = Flask(__name__)

@app.route("/detect", methods=["POST"])
def detect_faces():
    file = request.files["image"]
    image = face_recognition.load_image_file(file)
    face_locations = face_recognition.face_locations(image)
    return jsonify({"faces_detected": len(face_locations)})

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
