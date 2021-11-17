from site_flask import app
from flask import render_template, request, redirect, url_for, session, render_template_string


app.secret_key = b'\xee\xcf\xfd\x80\x961\xf2\xfd'

@app.route("/", methods=['GET', 'POST'])
@app.route("/edit", methods=['GET', 'POST'])
def edit():
    if request.method == "POST":

        if request.form["name"]:
            session['name'] = request.form["name"]
        if request.form["username"]:
            session['username'] = request.form["username"]
        if request.form["description"]:
            session['description'] = request.form["description"]
        
        return redirect(url_for("profile"))
    else:
        return render_template("form.html", title="Template Generator")


@app.route("/profile")
def profile(name='a', username='b', description='c'):
    if 'name' in session and 'username' in session and 'description' in session:
        name = session['name']
        username = session['username']
        description = session['description']

        return render_template_string(f"""
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
                <title>Keep waiting</title> 
            </head>
            <body>
                <h1>Your profile is being created ... </h1>
                <h2>It might take a while</h2>
                <br>
                <div>
                    While you wait, make sure your info is correct:
                    <ul>
                        <li> Name: {name} </l1>
                        <li> Username: {username} </li>
                        <li> Description: {description} </li>
                    </ul>
                </div>
            </body>
        """)
    else:
        return redirect('/')


@app.route("/admin")
def admin():
    return redirect("https://www.youtube.com/watch?v=dQw4w9WgXcQ")
