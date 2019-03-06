import warnings
from pandas import Series
import pandas as pd
from pandas import read_csv
from statsmodels.tsa.arima_model import ARIMA
from sklearn.metrics import mean_absolute_error
import matplotlib
from math import sqrt

pr=list()
def evaluate_arima_model(X, arima_order):
	X = X.astype('float32')
	train_size = int(len(X) * 0.66)
	train, test = X[0:train_size], X[train_size:]
	history = [x for x in train]
	predictions = list()
	for t in range(len(test)):
		model = ARIMA(history, order=arima_order)
		model_fit = model.fit(disp=0)
		yhat = model_fit.forecast()[0]
		predictions.append(yhat)
		history.append(test[t])
	mse = mean_absolute_error(test, predictions)
	rmse = sqrt(mse)
	return mse


def evaluate_models(dataset, p_values, d_values, q_values):
	dataset = dataset.astype('float32')
	best_score, best_cfg = float("inf"), None
	for p in p_values:
		for d in d_values:
			for q in q_values:
				order = (p,d,q)
				try:
					mse = evaluate_arima_model(dataset, order)
					if mse < best_score:
						best_score, best_cfg = mse, order
					#print('ARIMA%s MAE=%.3f' % (order,mse))
				except:
					continue
	return best_cfg

series=read_csv('data2.csv',header=0,index_col=0)
p_values = range(0, 5)
d_values = range(0, 3)
q_values = range(0, 5)
warnings.filterwarnings("ignore")
#series.plot()
#pyplot.show()
a=evaluate_models(series.values, p_values, d_values, q_values)
X = series.values
size = int(len(X) * 0.66)
train, test = X[0:size], X[size:len(X)]
history = [x for x in train]
predictions = list()
for t in range(len(test)):
	model = ARIMA(history, order=(a[0],a[1],a[2]))
	model_fit = model.fit(disp=0)
	output = model_fit.forecast()
	yhat = output[0]
	predictions.append(yhat)
	obs = test[t]
	history.append(obs)
	#print('predicted=%f, expected=%f' % (yhat, obs))
error = (mean_absolute_error(test, predictions))
#print('Test MAE: %.3f' % error)
#pyplot.plot(test)
#pyplot.plot(predictions, color='red')
#pyplot.show()
size = int(len(X))
train= X[0:size]
history = [x for x in train]
model = ARIMA(history, order=(a[0],a[1],a[2]))
model_fit = model.fit(disp=0)
output = model_fit.forecast(steps=2)
yhat=output[0]
print("Forecast for Pernem for Next two years is-\n")
for i in yhat:
    print(i)
