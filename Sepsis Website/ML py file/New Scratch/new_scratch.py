from __future__ import absolute_import,division,print_function,unicode_literals
import tensorflow as tf
from tensorflow import keras
from tensorflow.keras import layers
import numpy as np
import pandas as pd
import datetime
tf.enable_eager_execution()
try:
    model = tf.keras.models.load_model('C:\\Users\\manav\\Desktop\\model.h5')
except (ImportError,OSError):
    model = tf.keras.Sequential([
    # Adds a densely-connected layer with 64 units to the model:
    layers.Dense(39, activation='relu', input_shape=(40,)),
    # Add another:
    layers.Dense(39, activation='relu'),
    # Add a softmax layer with 10 output units:
    layers.Dense(2, activation='softmax')])

model.compile(optimizer=tf.keras.optimizers.Adam(0.01),
              loss='categorical_crossentropy',
              metrics=['accuracy'])
column_names = ["HR","O2Sat","Temp","SBP","MAP","DBP","Resp","EtCO2","BaseExcess","HCO3","FiO2","pH","PaCO2","SaO2","AST","BUN","Alkalinephos","Calcium","Chloride","Creatinine","Bilirubin_direct","Glucose","Lactate","Magnesium","Phosphate","Potassium","Bilirubin_total","TroponinI","Hct","Hgb","PTT","WBC","Fibrinogen","Platelets","Age","Gender","Unit1","Unit2","HospAdmTime","ICULOS","SepsisLabel"]
label_name = column_names[-1]
class_names = ['No Sepsis', 'Sepsis']
train_dataset_url = "C:\\Users\\manav\\Desktop\\train.csv"
train_dataset = pd.read_csv(train_dataset_url)
feature = train_dataset[train_dataset.columns[0:40]].values
feature.astype(np.float32)
tf.keras.utils.normalize(feature,axis=1,order=2)
print(feature)
labels = train_dataset[train_dataset.columns[40]].values

#features, labels = next(iter(train_dataset))
dataset = tf.data.Dataset.from_tensor_slices((feature, labels))
dataset = dataset.batch(32)
#print(feature)
log_dir="C:\\Users\\manav\\Desktop\\" + datetime.datetime.now().strftime("%Y%m%d-%H%M%S")
tensorboard_callback = tf.keras.callbacks.TensorBoard(log_dir=log_dir, histogram_freq=1)
model.fit(dataset,epochs=10,callbacks=[tensorboard_callback])

model.save('C:\\Users\\manav\\Desktop\\model.h5')
tfjs.converters.save_keras_model(model, 'C:\\Users\\manav\\Desktop\\')
dataset = tf.data.Dataset.from_tensor_slices((feature, labels))
dataset = dataset.batch(32)

model.evaluate(dataset)

data = np.asarray([
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,0,1,-98,1,],
    [61,99,36,124,65,43,17,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,0,1,-98,2],
    [64,98,0,125,64,41,27,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,0,1,-98,3]
], dtype=np.int32)

result = model.predict_classes(data, batch_size=32)
for i in result:
    print(class_names[i])
