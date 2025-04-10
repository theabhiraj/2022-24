import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.GridPane;
import javafx.stage.Stage;

import java.util.Random;

public class LudoGameUI extends Application {
    private static final int BOARD_SIZE = 40;
    private static final int NUM_PLAYERS = 4;

    private int[] playerPositions;
    private int currentPlayer;
    private Random random;

    public LudoGameUI() {
        playerPositions = new int[NUM_PLAYERS];c
        currentPlayer = 0;
        random = new Random();
    }

    private int rollDice() {
        return random.nextInt(6) + 1;
    }

    private void movePiece(int steps) {
        playerPositions[currentPlayer] = (playerPositions[currentPlayer] + steps) % BOARD_SIZE;
    }

    private void switchPlayer() {
        currentPlayer = (currentPlayer + 1) % NUM_PLAYERS;
    }

    private void updateUI(GridPane gridPane) {
        gridPane.getChildren().clear();

        for (int i = 0; i < NUM_PLAYERS; i++) {
            Button button = new Button("Player " + (i + 1) + " at " + playerPositions[i]);
            gridPane.add(button, 0, i);
        }
    }

    @Override
    public void start(Stage primaryStage) {
        primaryStage.setTitle("Ludo Game");

        GridPane gridPane = new GridPane();
        updateUI(gridPane);

        Button rollButton = new Button("Roll Dice");
        rollButton.setOnAction(event -> {
            int diceRoll = rollDice();
            movePiece(diceRoll);
            switchPlayer();
            updateUI(gridPane);
        });

        gridPane.add(rollButton, 1, NUM_PLAYERS);

        Scene scene = new Scene(gridPane, 300, 200);
        primaryStage.setScene(scene);

        primaryStage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }
}
