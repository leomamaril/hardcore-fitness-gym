<?php
include 'db.php';

// Fetch feedback data
$sql = "SELECT * FROM feedback ORDER BY create_at DESC";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    echo '<section id="user-feedback" class="my-5">';
    echo '<div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel">';
    echo '<div class="carousel-inner">';

    $isFirstItem = true; // Flag to mark the first active item

    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        $feedback = htmlspecialchars($row['mess']);
        $created_at = date("M j, Y g:i A", strtotime($row['create_at']));

        // Determine if this is the first item (active)
        $activeClass = $isFirstItem ? 'active' : '';
        $isFirstItem = false;

        echo <<<HTML
        <div class="carousel-item {$activeClass}">
            <div class="card border-primary mx-auto" style="max-width: 18rem;">
                <div class="card-body text-base">
                    <h5 class="card-title">{$name}</h5>
                    <p class="fs-6 card-text">{$email}</p>
                    <p class="card-text">{$feedback}</p>
                    <p class="card-text"><small class="text-body-secondary">Last updated {$created_at}</small></p>
                </div>
            </div>
        </div>
        HTML;
    }

    echo '</div>'; // Close carousel-inner

    // Add carousel controls
    echo <<<HTML
    <button class="carousel-control-prev" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    HTML;

    echo '</div>'; // Close carousel
    echo '</section>';
} else {
    echo "<p>No feedback found.</p>";
}

// Close connection
$conn->close();
?>