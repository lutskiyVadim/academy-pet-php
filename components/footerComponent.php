<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./style/container.css">
    <link rel="stylesheet" href="./style/global.css">
    <link rel="stylesheet" href="./components/footerComponent.css">

    <script>
        window.onload = function() {
            setInterval(updateTimers, 1000);
        }

        function updateTimers() {
            let now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();

            let times = [{
                    id: "startTimer",
                    hour: 12,
                    minute: 0
                },
                {
                    id: "breakTimer",
                    hour: 13,
                    minute: 20
                },
                {
                    id: "endTimer",
                    hour: 14,
                    minute: 50
                }
            ];

            times.forEach(function(time) {
                let currentTimeInSeconds = hours * 3600 + minutes * 60 + seconds;
                let targetTimeInSeconds = time.hour * 3600 + time.minute * 60;
                let timeDiff = targetTimeInSeconds - currentTimeInSeconds;

                if (timeDiff < 0) {
                    // Якщо минув час, встановлюємо "Кінець"
                    if (time.id === "endTimer") {
                        document.getElementById(time.id).innerHTML = "Кінець заняття";
                    } else {
                        document.getElementById(time.id).style.display = "none";
                    }
                } else {
                    // Виводимо таймер
                    displayTimer(time.id, timeDiff);
                }
            });
        }

        function displayTimer(id, timeDiff) {
            let hours = Math.floor(timeDiff / 3600);
            let minutes = Math.floor((timeDiff % 3600) / 60);
            let seconds = timeDiff % 60;
            document.getElementById(id).innerHTML = formatTime(hours, minutes, seconds);
        }

        function formatTime(hours, minutes, seconds) {
            return hours + " год - " + minutes + " хв - " + seconds + " сек.";
        }
    </script>

</head>

<body>
    <footer>
        <div class="footer container">
            <a href="/" class="footer__php">PHP</a>

            <div class="footer__box">
                <div>
                    <p>Працюємо з
                        <br>12:00 до 14:50
                    </p>
                </div>

                <div class="footer__list">
                    <a href="" class="footer__link">Services</a>
                    <a href="" class="footer__link">Our Projects</a>
                    <a href="" class="footer__link">Technologies</a>
                    <a href="" class="footer__link">Blog</a>
                </div>

                <div class="footer__list custom__list">
                    <p id="startTimer">Час до початку: </p>
                    <p id="breakTimer">Час до перерви: </p>
                    <p id="endTimer">Час до закінчення: </p>
                </div>


            </div>
        </div>
    </footer>
</body>

</html>