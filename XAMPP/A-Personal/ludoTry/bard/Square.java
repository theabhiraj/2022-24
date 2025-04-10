public class Square {

    private final Color color;
    private final boolean isSafeZone;

    public Square(Color color, boolean isSafeZone) {
        this.color = color;
        this.isSafeZone = isSafeZone;
    }

    public Color getColor() {
        return color;
    }

    public boolean isSafeZone() {
        return isSafeZone;
    }
}
