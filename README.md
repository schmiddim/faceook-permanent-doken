#Get a permanent Access Token for Facebook Pages

### Inspired by this [StackOverFlow Post](https://stackoverflow.com/a/28418469)

1. Create Facebook App

    If you already have an app, skip to step 1.
    
    Go to [My Apps](https://developers.facebook.com/apps/).
    
    Click "+ Add a New App".
    Setup a website app.
    
    *You don't need to change its permissions or anything. You just need an app that wont go away before you're done with your access token.*

2. Create a new Page.
    
    1. Go to the [Graph API Explorer](https://developers.facebook.com/tools/explorer).
    2. Select the application you want to get the access token for (in the "Application" drop-down menu, not the "My Apps" menu).
    3. Select the Page you want to get the access token for
    4. Click "Get Token" > "Get User Access Token".
    5. In the pop-up, under the "Extended Permissions" tab, check "manage_pages".
    6. Click "Get Access Token".
    7. Grant access from a Facebook account that has access to manage the target page. Note that if this user loses access the final, never-expiring access token will likely stop working.
 
    *The token that appears in the "Access Token" field is your short-lived access token.*
        
3. Generate Long-Lived Access Token
    1. copy **config.php.dist** to **config.php** and fill out all variables
    2. execute **get-the-token.php** and pass the short lived token from Facebook
    3. Validate the generated token on [Facebook](https://developers.facebook.com/tools/debug/accesstoken/?q=EAAEnoXnaaGkBAAaLoIfLmwQjXe6MZCrNxMgX4yCwHPoyEIUYkPKR0NLYEjZBjsTFnzqc6oaj40AFpzZAlasHQaFAnKEpzNAfgTE1nSHCXR7lIBUE0P0AMP78wZAhlU9JZCcQdRpozZCGqMW4C5ZAO7k5caAH7ITZB7I5j1LdG4NRtQZDZD&version=v2.11)
    4. Enter the Token in the **config.php**
    5. run the script **post-to-wall.php** and you should see content on your page