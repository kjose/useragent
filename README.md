# User Agent Mode
---

This script allows you to load the website of your choice in the User Agent mobile, tablet or desktop.

## List of User Agents
---

User agent desktop : 
Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36

User agent tablet : 
Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3

User agent mobile : 
Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3


## How to
---

First, load the website of your choice.

Then, inject the following script in the javascript console.


````
var fileref = document.createElement('script');
fileref.setAttribute("type", "text/javascript");
fileref.setAttribute("src", "https://projets.kevinjose.fr/useragent/inject.js");
document.getElementsByTagName("head")[0].appendChild(fileref);
````
