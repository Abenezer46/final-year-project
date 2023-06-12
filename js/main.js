        // Track mouse movements
        var mouseMoved = false;
        document.addEventListener('mousemove', function () {
            mouseMoved = true;
        });

        // Set a timer to check for inactivity
        var inactivityTimer = setTimeout(function () {
            // Show a prompt after 30 seconds of inactivity
            if (!mouseMoved) {
                alert('Are you there?');
            }
        }, 30000);

        // Set a timer to redirect to the login page after 60 seconds of inactivity
        var redirectTimer = setTimeout(function () {
            // Redirect to the login page after 60 seconds of inactivity
            if (!mouseMoved) {
                window.location.href = './pages/login.php';
            }
        }, 60000);

        // Reset the timers on mouse movement
        document.addEventListener('mousemove', function () {
            mouseMoved = true;
            clearTimeout(inactivityTimer);
            clearTimeout(redirectTimer);
            inactivityTimer = setTimeout(function () {
                if (!mouseMoved) {
                    alert('Are you there?');
                }
            }, 30000);
            redirectTimer = setTimeout(function () {
                if (!mouseMoved) {
                    window.location.href = './pages/login.php';
                }
            }, 60000);
        });