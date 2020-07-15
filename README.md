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

## GitHub Workflow

In order to be able to run the GitHub workflow, the secret `GOOGLE_APPLICATION_CREDENTIALS` needs
to be filled with a minified Service Account JSON key. You can minify the JSON with
[jq](https://stedolan.github.io/jq/)

```bash
cat credentials/firebase.json | jq -c

# On a mac, you can copy it directly with
cat credentials/firebase.json | jq -c | pbcopy
```
