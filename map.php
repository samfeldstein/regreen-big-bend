<?php
/*
Template Name: Map
*/
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>ReGreen Big Bend</title>
    <meta name="description" content="Conserving and restoring native habitat in Texas’s Big Bend.">

    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <style>
      .modal {
        display: none;
        /* Show modal by default */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
      }

      /* Modal Content */
      .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
        text-align: center;
      }

      /* Disabled button style */
      button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
      }

      iframe {
        width: 100%;
        max-width: 100%;
        min-height: 600px;
        border-style: solid;
        border-width: 1px;
        border-color: #EAEAEA;
        border-radius: 4px;
      }
    </style>
  </head>

  <body>
    <header>
      <h1>Brewster County, TX, Terlingua Ranch Property Appraisal Information</h1>
      <p class="tagline">Conserving and restoring native habitat in Texas’s Big Bend.</p>
      <nav>
        <a href="/">Home</a>
        <a href="/land/">Land for Sale</a>
      </nav>
    </header>
    <!-- Modal -->
    <div id="disclaimerModal" class="modal">
      <div class="modal-content">
        <h2></h2>
        <p>
          This interactive map uses data publicly available from the Brewster County Appraisal District.
          It was accurate at the time of map creation in late 2024 and early 2025, but much of the data
          changes regularly.</p>
        <p>Regreen Big Bend LLC does not warrant nor accepts any liability for the
          accuracy of this map. Users use the map at their own risk and are responsible for checking
          any information with the <a href="https://brewstercotad.org">Brewster County Appraisal District</a>.</p>
        <p>
          <input type="checkbox" id="agreeCheckbox">
          <label for="agreeCheckbox"><strong>I agree to the terms and conditions.</strong></label>
        </p>
        <button id="proceedButton" disabled>Proceed</button>
      </div>
    </div>



    <iframe src="https://app.atlas.co/embeds/LDnkjwJnnBQh8chpmiTT" frameborder="0"></iframe>
    <?php get_footer("custom"); ?>
    <script>
      const modal = document.getElementById('disclaimerModal');
      const agreeCheckbox = document.getElementById('agreeCheckbox');
      const proceedButton = document.getElementById('proceedButton');

      // Check if disclaimer was accepted before
      if (!localStorage.getItem("disclaimerAccepted")) {
        modal.style.display = 'block';
      }

      // Enable the button when checkbox is checked
      agreeCheckbox.addEventListener('change', () => {
        proceedButton.disabled = !agreeCheckbox.checked;
      });

      // When the user clicks proceed, hide the modal and store the flag
      proceedButton.addEventListener('click', () => {
        localStorage.setItem("disclaimerAccepted", "true");
        modal.style.display = 'none';
      });
    </script>
  </body>

</html>