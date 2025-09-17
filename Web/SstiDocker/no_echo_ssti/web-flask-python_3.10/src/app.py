from flask import Flask, request, render_template, render_template_string

app = Flask(__name__)

@app.route('/')
def index():
    if 'username' in request.args:
        username = request.args.get('username', '')
        welcome_msg = f"Welcome: {username}"
        render_template_string(welcome_msg)
    else:
        welcome_msg = "username不能为空"

    return render_template("index.html", welcome_msg=welcome_msg)