this is users table "id username email points created_at password"
this is bets "id	user_id	lottery_id	bet_number	points	created_at"


<div class="form-group"><label for="lottery_id">Select Lottery:</label><select id="lottery_id" name="lottery_id" required><option value="">Select a lottery</option><?php foreach ($lotteries as $lottery): ?><option value="<?php echo $lottery['id']; ?>"><?php echo htmlspecialchars($lottery['name']); ?></option><?php endforeach; ?></select></div>




<!-- <div class="form-group">
                        <label for="bet_points">Points to Bet:</label>
                        <div class="points-buttons">
                            < ?php
                            $available_points = [50, 100, 200, 500, 1000, 1500];
                            $display_points = [];

                            foreach ($available_points as $point) {
                                if ($point <= $user_points) {
                                    $display_points[] = $point;
                                }
                            }

                            foreach ($display_points as $point) {
                                echo '<button type="button" class="points-button" data-value="' . $point . '">' . $point . '</button>';
                            }
                            ?>
                        </div>
                        <input type="hidden" id="bet_points" name="bet_points" required>
                    </div> -->
<!-- 

// For Buttons of values

// document.querySelectorAll('.points-button').forEach(function(button) {
//     button.addEventListener('click', function() {
//         document.querySelectorAll('.points-button').forEach(function(btn) {
//             btn.classList.remove('active');
//         });
//         this.classList.add('active');
//         document.getElementById('bet_points').value = this.getAttribute('data-value');
//     });
// }); 


-->