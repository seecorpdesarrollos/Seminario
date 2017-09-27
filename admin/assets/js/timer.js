   idle({
       onIdle: function() {
           window.location.href = 'sessionTime';
       },
       // idle: 3600000,
       idle: 3600000,
       // keepTracking: true,
   }).start();