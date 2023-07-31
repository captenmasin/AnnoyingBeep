<!doctype html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Annoying Beep</title>
    <meta name="description" content="Finally, a website for beeping. Frustrate and annoying your friend, family, and coworkers with the most powerful tool on the web.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Annoying Beep">
    <meta property="og:url" content="https://annoyingbeep.com">
    <meta property="og:image" content="https://annoyingbeep.com/images/social.png">

    <link rel="stylesheet" href="/paper.min.css">
    <link rel="stylesheet" href="/app.css">

    <meta name="theme-color" content="#fafafa">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">

    <?php include_once 'meta.php'; ?>

    <link rel="manifest" href="/manifest.json" crossorigin="use-credentials">

    <link rel="mask-icon" href="/images/safari-pinned-tab.svg" color="#DC2626">
    <meta name="msapplication-TileColor" content="#DC2626">
    <meta name="theme-color" content="#DC2626">

    <script defer data-domain="annoyingbeep.com" src="https://plausible.io/js/script.js"></script>

    <script type="text/javascript">
		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.register('/service-worker.js', {
				scope: '.'
			}).then(async () => {
				const registration = navigator.serviceWorker.ready;
				if ('periodicSync' in registration) {
					const status = await navigator.permissions.query({
						name: 'periodic-background-sync',
					});
					if (status.state === 'granted') {
						try {
							await registration.periodicSync.register('all', {
								minInterval: 24 * 60 * 60 * 1000
							});
							console.log('Periodic background sync registered!');
						} catch (e) {
							console.error(`Periodic background sync failed:\n${e}`);
						}
					}
				}
			});

			self.addEventListener('periodicsync', (event) => {
				console.log('Periodicsync')
			});
		}
    </script>


</head>

<body class="h-screen">

<div class="main-container">
    <div class="container text-center flex-center">
        <h1>
            Annoying beep
        </h1>
        <p>
            Finally, a website for beeping.
        </p>
        <p>
            Frustrate and annoying your friend, family, and coworkers with the most powerful tool on the web.
        </p>
        <br>
        <div class="margin-top">
            <button id="start">Start that beep</button>
            <button id="stop1" hidden>Stop</button>
            <button id="stop2" hidden>No seriously, stop</button>
            <button id="stop3" hidden>Please</button>
            <div id="sorry" hidden class="alert-danger alert margin-top">
                Sorry, stopping simply isn't an option
            </div>
        </div>
        <br><br>
        <div class="flex-center text-center margin-top padding-top">
            <img src="/images/mum.png" height="100" width="100" class="round mx-auto" alt="Mummy"/>
            <p>
                “What? That's stupid, I don't get it.”
            </p>
            <p class="text-md">
                - My mum
            </p>
        </div>

        <audio id="audio" loop>
            <source src="beep.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>

    <footer>
        <div class="container text-center padding-bottom text-small">
            Made with annoyance and hatred 👹 by <a href="https://www.buymeacoffee.com/captenmasin" target="_blank">Mason</a>
        </div>
    </footer>
</div>

<script>
	const stopButton1 = document.getElementById('stop1')
	const stopButton2 = document.getElementById('stop2')
	const stopButton3 = document.getElementById('stop3')
	const startButton = document.getElementById('start')
	const sorryContent = document.getElementById('sorry')

	startButton.addEventListener('click', function () {
		stopButton1.removeAttribute('hidden')
		startButton.setAttribute('disabled', true)
		const audio = document.getElementById("audio");
		audio.play()
	})

	stopButton1.addEventListener('click', function () {
		stopButton1.setAttribute('hidden', true)
		stopButton2.removeAttribute('hidden')
	})

	stopButton2.addEventListener('click', function () {
		stopButton2.setAttribute('hidden', true)
		sorryContent.removeAttribute('hidden')
		stopButton3.removeAttribute('hidden')
	})

	stopButton3.addEventListener('click', function () {
		stopButton3.setAttribute('disabled', true)
		sorryContent.classList.add("wiggle");
	})
</script>
</body>
</html>
