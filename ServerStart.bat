cd FitWorkout
start "" php yii serve --docroot="frontend/web/" --port=7070  
start "" php yii serve --docroot="backend/web/" --port=9090 
start "" php yii serve --docroot="api/web/" --port=8080