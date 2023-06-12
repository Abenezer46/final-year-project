        // Track mouse movements
        var mouseMoved = false;
        document.addEventListener('mousemove', function () {
            mouseMoved = true;
        });


        // Set a timer to redirect to the login page after 60 seconds of inactivity
        var redirectTimer = setTimeout(function () {
            // Redirect to the login page after 60 seconds of inactivity
            if (!mouseMoved) {
                window.location.href = './pages/login.php';
            }
        }, 30000);

        // Reset the timers on mouse movement
        document.addEventListener('mousemove', function () {
            mouseMoved = true;
            clearTimeout(redirectTimer);
            redirectTimer = setTimeout(function () {
                if (!mouseMoved) {
                    window.location.href = './pages/login.php';
                }
            }, 30000);
        });