<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contacto JeffCo</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Roboto:300,400');

		* {
			font-family: 'Roboto', sans-serif;
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			outline: none;
		}

		body {
			width: 100%;
			background-color: rgb(220, 220, 220);
		}

			body > main {
				width: 700px;
				padding: 16px;
				background-color: rgb(255, 255, 255);
				box-shadow: 0 0 03px rgba(0, 0, 0, 0.75);
				margin: 32px 0px;
			}

				body > main > h1 {
					font-size: 2em;
					font-weight: 400;
					width: 100%;
					text-align: center;
				}

				body > main > sub {
					width: 100%;
					display: flex;
					align-items: center;
					justify-content: center;
					font-size: 0.85em;
				}

				body > main > p {
					text-align: justify;
				}
	</style>
</head>
<body>
	<main>
		<h1>{{ $name }} contactó</h1>
		<sub>{{ $email }} | {{ $tel }} | {{ $city }}</sub>
		<p>{{ $message }}</p>
	</main>
</body>
</html>