from flask import Flask, render_template, request
import firebase_admin
from firebase_admin import credentials, firestore

app = Flask(__name__)

cred = credentials.Certificate("E:\deduplication\admin module\credentials.json")
firebase_admin.initialize_app(cred, {"databaseURL": "https://firebase-adminsdk-rcife@deduplication002.iam.gserviceaccount.com"})
db = firestore.client()




from flask import request

@app.route('/register_student', methods=['POST'])
def register_student():
    try:
        registration_number = request.form.get('registration_number')
        name = request.form.get('name')
        date_of_birth = request.form.get('date_of_birth')
        student_class = request.form.get('class')

        # Handle file upload
        if 'student_image' in request.files:
            student_image = request.files['student_image']
            # Save the file or perform any necessary operations
            # For example: student_image.save('path/to/save/image.jpg')
        else:
            student_image = None

        # Add the data to Firestore
        db.collection('students').add({
            'registration_number': registration_number,
            'name': name,
            'date_of_birth': date_of_birth,
            'student_image': student_image,
            'student_class': student_class,
        })

        return 'Student registered successfully.'
    except Exception as e:
        print(e)
        return 'Internal Server Error', 500
