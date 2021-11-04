<div class="clock">
    <div class="hours-container">
        <div class="hours" id="hours"></div>
    </div>
    <div class="minutes-container">
        <div class="minutes" id="minutes"></div>
    </div>
    <div class="seconds-container">
        <div class="seconds" id="seconds"></div>
        <div class="clock_dot"></div>
    </div>
    
    <script src="scripts/clocker.js"></script>

</div> <!-- clock -->

<div class="form-clock">
    <form method="POST" action="backend/send.php">
        <input class="btn" id="start" type="submit" name="submit" value="Start Work">
    </form>

    <form method="POST" action="backend/send.php">
        <input class="btn" id="stop" type="submit" name="submit" value="Stop Work">
    </form>
</div> <!-- form-clock -->
