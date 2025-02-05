import streamlit as st
import pandas as pd
import mysql.connector

# Function to get database connection
def get_connection():
    connection = mysql.connector.connect(
        host='localhost',
        user='root',
        password='',
        database='analitik data lanjut'
    )
    return connection

# Function to get data from the database
def get_data_from_db():
    conn = get_connection()
    query = 'SELECT * FROM heart'
    df = pd.read_sql(query, conn)
    conn.close()
    return df

# Function for heart disease prediction (replace this with your actual prediction logic)
def predict_heart_disease(age, sex, cp, thalach):
    # Replace this with your actual prediction logic
    # Example: If age is greater than 40, predict heart disease
    if age > 40:
        return 1
    else:
        return 0

#judul aplikasi
st.title("Analitik Data Lanjut")

#Menambahkan navigasi di sidebar
page = st.sidebar.radio("Navigation", ["Dataset","Form Input"])

if page == "Form Input":
    st.header("Data Mining Prediksi Penyakit Jantung")
    
    with st.form(key='input_form'):
        input_age = st.text_input('Input Umur')
        input_sex = st.text_input('Input Jenis Kelamin')
        input_cp = st.number_input('Input Nilai Jenis Nyeri Dada')
        input_thalach = st.number_input('Input nilai Detak Jantung Maksimum')
        submit_button = st.form_submit_button(label='Submit Data')

    if submit_button:
        # Convert inputs to appropriate data types
        age = int(input_age)
        sex = int(input_sex)
        cp = int(input_cp)
        thalach = int(input_thalach)

        # Call the predict function (replace this with your actual prediction logic)
        heart_prediction = predict_heart_disease(age, sex, cp, thalach)

        # Display the prediction result
        if heart_prediction == 1:
            heart_disease_diagnosis = 'Pasien Terkena Penyakit Jantung'
        else:
            heart_disease_diagnosis = 'Pasien tidak Terkena Penyakit Jantung'
        
        st.success("Data successfully submitted to the database!")
        st.info(f"Diagnosis: {heart_disease_diagnosis}")