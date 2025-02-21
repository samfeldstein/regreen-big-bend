<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = sanitize_text_field($_POST["name"]);
  $email = sanitize_email($_POST["email"]);
  $message = sanitize_textarea_field($_POST["message"]);

  // Add code to save the form data to the database
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_submissions';
  $data = array(
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'submission_time' => current_time('mysql')
  );
  $insert_result = $wpdb->insert($table_name, $data);

  if ($insert_result === false) {
    $response = array(
      'success' => false,
      'message' => 'Error saving the form data.',
    );
  } else {
    $response = array(
      'success' => true,
      'message' => 'Form data saved successfully.'
    );
  }

  // Return the JSON response
  header('Content-Type: application/json');
  echo json_encode($response);
  exit;
}

// Show contact form submissions in admin panel
function display_contact_form_submissions_page() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'contact_form_submissions';
  $form_data = $wpdb->get_results("SELECT * FROM $table_name WHERE name <> '' AND email <> '' AND message <> '' ORDER BY submission_time DESC", ARRAY_A);

  ?>
  <div class="wrap">
    <h1>Contact Form Submissions</h1>
    <table class="wp-list-table widefat fixed striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Message</th>
          <th>Submission Time</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($form_data as $data) : ?>
          <tr>
            <td><?php echo esc_html($data['name']); ?></td>
            <td><?php echo esc_html($data['email']); ?></td>
            <td><?php echo esc_html($data['message']); ?></td>
            <td><?php echo esc_html($data['submission_time']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php }

function register_contact_form_submissions_page() {
  add_menu_page(
    'Contact Form Submissions',
    'Form Submissions',
    'manage_options',
    'contact_form_submissions',
    'display_contact_form_submissions_page',
    'dashicons-feedback'
  );
}
add_action('admin_menu', 'register_contact_form_submissions_page');
?>

