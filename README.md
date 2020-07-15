# firebase-bug
Demonstration of googleapis/google-cloud-php#2581

## Configuration

Supply a Firestore keyfile in **credentials/firebase.json**. Keyfiles are accessed from
the [API Console Credentials Page](https://console.cloud.google.com/projectselector/apis/credentials).

`App` expects a Collection in the Firestore database called "users" with at least one Document.

```bash
### Running in a terminal window
php src/index.php

### Running in a browser
php -S 127.0.0.1:8000 -t src
```
