    <?php wp_footer(); ?>
    <script src="https://www.sevenrooms.com/widget/embed.js"></script>
    <script>
SevenroomsWidget.init({
    venueId: '<?php the_field('sevenrooms_venue_id', 'option'); ?>',
    triggerId: 'book', // id of the dom element that will trigger this widget
    type: 'reservations', // either 'reservations' or 'waitlist' or 'events'
    styleButton: false, // true if you are using the SevenRooms button
    clientToken: '', //(Optional) Pass the api generated clientTokenId here
});
    </script>

    </body>

    </html>