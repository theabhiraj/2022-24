import java.awt.Color;

public class Board {

    private final Square[][] squares;

    public Board(int size) {
        this.squares = new Square[size][size];
        // Initialize squares with colors and safe zones
    }

    public Square getSquare(int x, int y) {
        return squares[x][y];
    }

    // ... Other methods related to accessing and manipulating the board
}
