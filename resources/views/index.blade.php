<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" > </script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous" defer
    ></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous" defer
    ></script>
</head>
<body>
    <div id="concurrent-session-modal" class="" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Concurrent Session Detected</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>An active session is already in progress.</p>
              <p>Do you want to continue with this new session or close it?</p>
              <div class="btn-group">
                <button type="button" id="continue-button" class="btn btn-primary">Continue</button>
                <button type="button" id="close-button" class="btn btn-secondary">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script>
        console.log(document.cookie.includes('currentSession=true'))
        // if (document.cookie.includes('currentSession=true')) {
            // Show modal with message and buttons
            // $('#concurrent-session-modal').modal('show');

            $('#continue-button').click(function() {
                $.ajax({
                url: `{{url('api/continue-session')}}`,
                method: 'POST',
                success: function(response) {
                    // Handle successful continuation (close previous session if possible)
                    alert('current session continue')
                },
                error: function(error) {
                    // Handle errors
                }
                });
            });

            $('#close-button').click(function() {
                $.ajax({
                url: `{{url('api/close-session')}}`,
                method: 'POST',
                success: function(response) {
                    // Handle successful closing of new session
                    alert('current session continue')
                },
                error: function(error) {
                    // Handle errors
                }
                });
            });
        // }

    </script>
</body>
</html>
