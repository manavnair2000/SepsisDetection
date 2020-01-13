from __future__ import absolute_import, division, print_function, unicode_literals
from keras.models import *
import tensorflowjs as tfjs
import os
import numpy as np
import matplotlib.pyplot as plt
import tensorflow as tf
np.set_printoptions(precision=3, suppress=True)
tfjs_target_dir = "C:\\Users\\manav\\Desktop"
print("TensorFlow version: {}".format(tf.__version__))
print("Eager execution: {}".format(tf.executing_eagerly()))
train_dataset_url = "C:\\Users\\manav\\Desktop\\train.csv"

#train_dataset_fp = tf.keras.utils.get_file(fname=os.path.basename(train_dataset_urlorigin=train_dataset_url)

print("Local copy of the dataset file: {}".format(train_dataset_url))
# column order in CSV file
column_names = ["HR","O2Sat","Temp","SBP","MAP","DBP","Resp","EtCO2","BaseExcess","HCO3","FiO2","pH","PaCO2","SaO2","AST","BUN","Alkalinephos","Calcium","Chloride","Creatinine","Bilirubin_direct","Glucose","Lactate","Magnesium","Phosphate","Potassium","Bilirubin_total","TroponinI","Hct","Hgb","PTT","WBC","Fibrinogen","Platelets","Age","Gender","Unit1","Unit2","HospAdmTime","ICULOS","SepsisLabel"]

feature_names = column_names[:-1]
label_name = column_names[-1]

print("Features: {}".format(feature_names))
print("Label: {}".format(label_name))
class_names = ['No Sepsis', 'Sepsis']
batch_size = 54

train_dataset = tf.data.experimental.make_csv_dataset(
    train_dataset_url,
    batch_size,
    column_names=column_names,
    label_name=label_name,
    num_epochs=1,
    ignore_errors=True)
features, labels = next(iter(train_dataset))

print(features)
plt.scatter(features['HR'],
            features['O2Sat'],
            c=labels,
            cmap='viridis')

plt.xlabel("HR")
plt.ylabel("O2Sat")
plt.show()
def pack_features_vector(features, labels):
  """Pack the features into a single array."""
  features = tf.stack(list(features.values()), axis=1)
  return features, labels
train_dataset = train_dataset.map(pack_features_vector)
print(type(train_dataset))
features, labels = next(iter(train_dataset))

print(features[:5])

'''try:
  model = load_model("model.h5")
except ImportError:'''
model = tf.keras.Sequential([
    tf.keras.layers.Dense(39, activation=tf.nn.relu, input_shape=(40,)),  # input shape required
    tf.keras.layers.Dense(39, activation=tf.nn.relu),
    tf.keras.layers.Dense(2,activation=tf.nn.sigmoid)
  ])
predictions = model(features)
predictions[:5]
tf.nn.softmax(predictions[:5])
print("Prediction: {}".format(tf.argmax(predictions, axis=1)))
print("    Labels: {}".format(labels))
loss_object = tf.keras.losses.SparseCategoricalCrossentropy(from_logits=True)
def loss(model, x, y):
  y_ = model(x)

  return loss_object(y_true=y, y_pred=y_)


l = loss(model, features, labels)
print("Loss test: {}".format(l))
def grad(model, inputs, targets):
  with tf.GradientTape() as tape:
    loss_value = loss(model, inputs, targets)
  return loss_value, tape.gradient(loss_value, model.trainable_variables)
optimizer = tf.keras.optimizers.SGD(learning_rate=0.01)
loss_value, grads = grad(model, features, labels)

print("Step: {}, Initial Loss: {}".format(optimizer.iterations.numpy(),
                                          loss_value.numpy()))

optimizer.apply_gradients(zip(grads, model.trainable_variables))

print("Step: {},         Loss: {}".format(optimizer.iterations.numpy(),loss(model, features, labels).numpy()))
## Note: Rerunning this cell uses the same model variables

# Keep results for plotting
train_loss_results = []
train_accuracy_results = []

num_epochs = 100

for epoch in range(num_epochs):
  epoch_loss_avg = tf.keras.metrics.Mean()
  epoch_accuracy = tf.keras.metrics.SparseCategoricalAccuracy()

  # Training loop - using batches of 32
  for x, y in train_dataset:
    # Optimize the model
    loss_value, grads = grad(model, x, y)
    optimizer.apply_gradients(zip(grads, model.trainable_variables))

    # Track progress
    epoch_loss_avg(loss_value)  # Add current batch loss
    # Compare predicted label to actual label
    epoch_accuracy(y, model(x))
  tfjs.converters.save_keras_model(model, tfjs_target_dir)

  # End epoch
  train_loss_results.append(epoch_loss_avg.result())
  train_accuracy_results.append(epoch_accuracy.result())

  if epoch % 50 == 0:
    print("Epoch {:03d}: Loss: {:.3f}, Accuracy: {:.3%}".format(epoch,
                                                                epoch_loss_avg.result(),
                                                                epoch_accuracy.result()))
  
  #saver=tf.train.Saver()
  #with tf.Session() as Saver:
  #print(type(x),type(y))
  
fig, axes = plt.subplots(2, sharex=True, figsize=(12, 8))
fig.suptitle('Training Metrics')

axes[0].set_ylabel("Loss", fontsize=14)
axes[0].plot(train_loss_results)

axes[1].set_ylabel("Accuracy", fontsize=14)
axes[1].set_xlabel("Epoch", fontsize=14)
axes[1].plot(train_accuracy_results)
plt.show()
model.save("model.h5")
test_url = "C:\\Users\\manav\\Desktop\\test.csv"

#test_fp = tf.keras.utils.get_file(fname=os.path.basename(test_url),origin=test_url)
test_dataset = tf.data.experimental.make_csv_dataset(
    test_url,
    batch_size=23,
    column_names=column_names,
    label_name='SepsisLabel',
    num_epochs=1,
    shuffle=False)
features, labels = next(iter(test_dataset))
test_dataset = test_dataset.map(pack_features_vector)
test_accuracy = tf.keras.metrics.Accuracy()

for (x, y) in test_dataset:
  logits = model(x)
  prediction = tf.argmax(logits, axis=1, output_type=tf.int32)
  test_accuracy(prediction, y)

print("Test set accuracy: {:.3%}".format(test_accuracy.result()))
tf.stack([y,prediction],axis=1)
predict_dataset = tf.convert_to_tensor([
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,0,1,-98,1,],
    [61,99,36,124,65,43,17,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,0,1,-98,2],
    [64,98,0,125,64,41,27,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,75,0,0,1,-98,3]
])
#print(type(test_dataset))

predictions = model(predict_dataset)

for i, logits in enumerate(predictions):
  class_idx = tf.argmax(logits).numpy()
  p = tf.nn.softmax(logits)[class_idx]
  name = class_names[class_idx]
  print("Example {} prediction: {} ".format(i, name))
