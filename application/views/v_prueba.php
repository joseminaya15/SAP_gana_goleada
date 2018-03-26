<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <title>LinkedIn JavaScript API Sample Application</title>


  <!-- Load in the JavaScript framework and register a callback function -->
  <script type="text/javascript" src="http://platform.linkedin.com/in.js">

  api_key: "864xp2wdu9eghe"
  onLoad: onLinkedInLoad
  authorize: true

  </script>

 <script type="text/javascript">

        function onLinkedInLoad() {
                // Listen for an auth event to occur
                IN.Event.on(IN, "auth", onLinkedInAuth);
            } 

        function onLinkedInAuth() {
                // After they've signed-in, print a form to enable keyword searching
                var div = document.getElementById("sendMessageForm");

                div.innerHTML = '<h2>Send a Message To Yourself</h2>';
                div.innerHTML += '<form action="javascript:SendMessage();">' +
                             '<input id="message" size="30" value="You are awesome!" type="text">' +
                             '<input type="submit" value="Send Message!" /></form>';
            }

        function SendMessage(keywords) {
                // Call the Message sending API with the viewer's message
                // On success, call displayMessageSent(); On failure, do nothing.

                var message = document.getElementById('message').value; 
                var BODY = {
                    "content": {
                        "submitted-url": "http://developer.linkedinlabs.com/jsapi-console",
                        "title": "JSAPI Console",
                        "description": "JSAPI Developer Console",
                        "submitted-image-url": "http://developer.linkedin.com/servlet/JiveServlet/downloadImage/102-1101-13-1003/30-25/LinkedIn_Logo30px.png"
                    },
                    "comment": "Prueba",
                    "visibility": {
                        "code": "anyone"
                    }
                }

            IN.API.Raw("/people/~/shares")
                  .method("POST")
                  .body(JSON.stringify(BODY)) 
                  .result(displayMessageSent)
                  .error(function error(e) { alert (e.message) });
        }

        function displayMessageSent() {
                var div = document.getElementById("sendMessageResult");
                 div.innerHTML += "Yay!";
            }

        </script>
 </head>
 <body>
 <script type="IN/Login"></script>
 <div id="sendMessageForm"></div>
 <div id="sendMessageResult"></div>
 </body>
 </html>