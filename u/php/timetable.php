
<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hardcore";
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
// Fetch all timetable data
$sql = "SELECT * FROM timetable ORDER BY time_slot, FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')";
$stmt = $conn->query($sql);
$timetableData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Organize data by time slots
$organizedData = [];
foreach ($timetableData as $row) {
    $organizedData[$row['time_slot']][$row['day']] = $row;
}
?>
<section class="classes-timetable spad" id="timetable">
    <div class="moulpali-regular mt-5 mb-5 pad">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2 class="moul-regular">Timetable</h2>
                </div>
                <div class="nav-controls">
                    <ul>
                        <li class="active" data-tsfilter="all">All</li>
                        <li data-tsfilter="trainer">Trainer</li>
                        <li data-tsfilter="pilates">Pilates</li>
                        <li data-tsfilter="yoga">Yoga</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $timeSlots = ['07:00', '11:00', '14:00', '17:00', '20:00'];
                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

                            foreach ($timeSlots as $timeSlot) {
                                echo "<tr>";
                                echo "<td class='workout-time'>{$timeSlot}</td>";

                                foreach ($days as $day) {
                                    if (isset($organizedData[$timeSlot][$day])) {
                                        $activity = $organizedData[$timeSlot][$day];
                                        $activityClass = strtolower($activity['activity']); // Ensure lowercase for filtering
                                        echo "<td class='hover-bg ts-item' data-tsmeta='{$activityClass}'>";
                                        echo "<h6>{$activity['activity']}</h6>";
                                        echo "<span>{$activity['start_time']} - {$activity['end_time']}</span>";
                                        echo "<div class='trainer-name'>{$activity['trainer_name']}</div>";
                                        echo "</td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                }

                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.nav-controls li').click(function () {
            var filter = $(this).data('tsfilter');
            $('.nav-controls li').removeClass('active');
            $(this).addClass('active');

            if (filter === 'all') {
                $('.ts-item').show();
            } else {
                $('.ts-item').hide();
                $('.ts-item[data-tsmeta="' + filter + '"]').show();
            }
        });
    });
</script>