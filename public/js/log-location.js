// public/js/log-location.js

<<<<<<< HEAD
function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(sendLocationToServer);
    } else {
      console.error("Geolocation is not supported by this browser.");
    }
  }
  
  function sendLocationToServer(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
  
    fetch('/trackings', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
      },
      body: JSON.stringify({ latitude, longitude }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data.message);
      })
      .catch((error) => {
        console.error('Error logging location:', error);
      });
  }
  
  // Schedule the getLocation function to run every 5 minutes (300,000 milliseconds)
  setInterval(getLocation, 900000);
=======
(function() {
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(sendLocationToServer);
      } else {
        console.error("Geolocation is not supported by this browser.");
      }
    }
  
    function sendLocationToServer(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;
      const userId = document.querySelector('meta[name="user-id"]').content;
    
      fetch('/admin/log-location', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ latitude, longitude, user_id: userId }),
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data.message);
        })
        .catch((error) => {
          console.error('Error logging location:', error);
        });
    }
  
    // Call getLocation immediately when the script is loaded
    getLocation();
  
    // Schedule the getLocation function to run every 5 minutes (300,000 milliseconds)
    setInterval(getLocation, 100000);
  })();
>>>>>>> 307279c (custom-forms)
