<?php include('theme-parts/header.php');
$message='';
if ( isset( $_SESSION['message'] ) ) {
    $message = $_SESSION['message'];
    kill_session();
}

if (isset($_POST['submit'])) {
    $userid = $_SESSION['user_id'];

    $stmt = $conn->prepare("UPDATE `userdata` SET status = ? WHERE id = ?");

    $status = 1;

    $stmt->bind_param("ii", $status, $userid);

    if ($stmt->execute()) {
        $msg = "<div class='success'>Blog added successfully.</div>";
        session_message($msg);
    } else {
        $msg = "<div class='error'>Blog addition failed: " . $stmt->error . "</div>";
        session_message($msg);
    }

    $stmt->close();
}
?>

<div class="dashboard-acoount">
    <div class="dashboard-head">
        <h2>Request Authorship</h2>
        <p>Manage your general information, includinf phone number and email address where you can be contacted.</p>
    </div>
    <div class="dashboard-form-sty">
        <form id="becomeauthorform" method="post">
            <div class="row">
                <!-- Writing Experience -->
                <div class="input-field">
                    <select id="experience" name="experience" required>
                        <option value="" disabled selected>Have you written for other blogs or websites?</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>


                <!-- Interest -->
                <div class="input-field">
                    <textarea id="interest" name="interest" rows="3"
                        placeholder="Why do you want to write for our travel blog?" required></textarea>
                </div>

                <!-- Content Preferences -->
                <div class="input-field">
                    <div class="input-field">
                        <p>What type of travel content are you interested in writing?</p>
                        <div class="checkbox-field">
                          <input type="checkbox" id="destination-guides" name="content[]" value="destination-guides">
                          <label for="destination-guides">Destination Guides</label>
                        </div>
                        <div  class="checkbox-field">
                          <input type="checkbox" id="travel-tips" name="content[]" value="travel-tips">
                          <label for="travel-tips">Travel Tips</label>
                        </div>
                        <div class="checkbox-field">
                          <input type="checkbox" id="personal-stories" name="content[]" value="personal-stories">
                          <label for="personal-stories">Personal Travel Stories</label>
                        </div>
                        <div class="checkbox-field">
                          <input type="checkbox" id="budget-travel" name="content[]" value="budget-travel">
                          <label for="budget-travel">Budget Travel</label>
                        </div>
                        <div class="checkbox-field">
                          <input type="checkbox" id="luxury-travel" name="content[]" value="luxury-travel">
                          <label for="luxury-travel">Luxury Travel</label>
                        </div>
                        <div class="checkbox-field">
                          <input type="checkbox" id="other" name="content[]" value="other">
                          <label for="other">Other</label>
                        </div>
                      </div>                      
                </div>

                <!-- Region Specialization -->
                <div class="input-field">
                    <select id="regions" name="regions" required>
                        <option value="" disabled selected>Which regions do you specialize in?</option>
                        <option value="All">All</option>
                        <option value="Kathmandu">Kathmandu</option>
                        <option value="Bhaktapur">Bhaktapur</option>
                        <option value="Lalitpur">Lalitpur</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="submit-field">
                    <input type="submit" name="submit" value="Submit Application">
                </div>

            </div>
        </form>
    </div>
</div>

<?php include('theme-parts/footer.php') ?>