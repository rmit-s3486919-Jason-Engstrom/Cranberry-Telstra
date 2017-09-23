import requests


data={'photo': open('11.jpg','rb'),'name':'hello'}

try:
    response = requests.post('http://www.cranberry-telstra.appspot.com/site/parts/visionTest.php', files=data)
    print(response.content)
except:
    print('Exception!')