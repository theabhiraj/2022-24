import java.util.List; 
import java.util.ArrayList;

public class Player {
    private final String name;
    private final List<Token> tokens;

    public Player(String name) {
        this.name = name;
        this.tokens = new ArrayList<>();
        // Initialize tokens with starting positions
    }

    public String getName() {
        return name;
    }

    public List<Token> getTokens() {
        return tokens;
    }
}
