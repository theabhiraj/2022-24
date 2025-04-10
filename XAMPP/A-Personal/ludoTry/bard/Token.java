public class Token {
    private final Player player;
    private int position;

    public Token(Player player) {
        this.player = player;
    }

    public Player getPlayer() {
        return player;
    }

    public int getPosition() {
        return position;
    }

    public void setPosition(int position) {
        this.position = position;
    }
}
