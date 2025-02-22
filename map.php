<?php
/*
Template Name: Map
*/
?>

<?php get_header(); ?>

<header>
  <nav>
    <a href="/">Home</a>
    <a href="/land/">Land for Sale</a>
  </nav>
  <h1>Brewster County, TX <br />Terlingua Ranch Property Appraisal Information</h1>
</header>

<!-- Modal -->
<div id="disclaimerModal" class="modal">
  <div class="modal-content">
    <p>
      This interactive map uses data publicly available from the Brewster County Appraisal District.
      It was accurate at the time of map creation in late 2024 and early 2025, but much of the data
      changes regularly.</p>
    <p>Regreen Big Bend, LLC does not warrant nor accepts any liability for the
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

<?php get_footer(); ?>