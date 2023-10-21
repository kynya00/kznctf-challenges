from flask import Flask, render_template, render_template_string, request
from urllib.parse import unquote

app = Flask(__name__)
app.static_folder = 'static'


hackers_team = {
    "anonimous" : {
        "name": "anonimous",
        "attack": "ddos",
        "country": "Russia",
        "participants": "10",
        "description": "Fucking system",
        "picture": "https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Anonymous_emblem.svg/160px-Anonymous_emblem.svg.png"
    },
    "killnet" : {
        "name": "killnet",
        "attack": "ddos",
        "country": "Russia",
        "participants": "10",
        "description": "Fucking system",
        "picture": "data:image/png;base64,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"
    },
    "revil" : {
        "name": "revil",
        "attack": "ddos",
        "country": "Russia",
        "participants": "10",
        "description": "Fucking system",
        "picture": "data:image/png;base64,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"
    },
}

def blacklist(string):
    block = ["update"]
    
    for item in block:
        if item in string:
            return True
    return False


@app.route('/')
def index():
    render = render_template('index.html')
    return render_template_string(render)


@app.route('/<hackers>')

def detail(hackers):
    try:
        render = render_template('hackers_name.html', data=hackers_team[hackers])
        return render_template_string(render)
    except:
        if blacklist(hackers):
            return render_template('error.html')
        template='''<html lang="en">
                        <head>
                        <meta charset="UTF-8"> 
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="{{ url_for('static', filename='main.css') }}">
                        <title>404</title>
                        </head>
                        <body>
                                <div class="container">
                                    <h2> {} isn't a hackers group.</h2>
                                    <a href="/" class="hackers-link">Back</a>
                                </div>
                            </body>
                            </html>'''.replace("{}", hackers)
        #render = render_template('404.html', hackers=hackers)
        
        return render_template_string(template)

if __name__ == '__main__':
    app.run(debug=True)