from flask import Flask, request, jsonify
from PIL import Image
import numpy as np
import tensorflow as tf
import os

app = Flask(__name__)

# Load model once saat server mulai
model_path = "modelsampah.tflite"
interpreter = tf.lite.Interpreter(model_path=model_path)
interpreter.allocate_tensors()

input_details = interpreter.get_input_details()
output_details = interpreter.get_output_details()
input_shape = input_details[0]['shape']
target_size = (input_shape[2], input_shape[1])  # (width, height)

# Kategori klasifikasi
# mapping = ["Kardus", "Metal/Kaleng", "Kertas", "Botol Plastik/Plastik", "Sampah"]
mapping = [0,1,2,3,4]

@app.route('/api/klasifikasi', methods=['POST'])
def klasifikasi():
    if 'gambar' not in request.files:
        return jsonify({'error': 'gambar tidak ditemukan'}), 400

    file = request.files['gambar']
    try:
        img = Image.open(file.stream).convert("RGB")
        img = img.resize(target_size)
        img_array = np.array(img, dtype=np.float32) / 255.0
        input_data = np.expand_dims(img_array, axis=0)

        interpreter.set_tensor(input_details[0]['index'], input_data)
        interpreter.invoke()
        output_data = interpreter.get_tensor(output_details[0]['index'])
        predicted_class = int(np.argmax(output_data))

        jenis = mapping[predicted_class] if predicted_class < len(mapping) else "Tidak Diketahui"

        return jsonify({
            'data': jenis
        })
    
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    port = int(os.environ.get("PORT", 5000))
    app.run(debug=True, host='0.0.0.0', port=port)
