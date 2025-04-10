#include <SDL.h>
#include <iostream>
#include <vector>
#include <algorithm>

const int WINDOW_WIDTH = 800;
const int WINDOW_HEIGHT = 600;

SDL_Window* window = nullptr;
SDL_Renderer* renderer = nullptr;

struct Car {
    std::string name;
    std::string graphic;
};

class ParkingOrderGame {
private:
    std::vector<Car> parkingSpaces;
    std::vector<Car> correctOrder;

public:
    ParkingOrderGame(const std::vector<Car>& order) : correctOrder(order) {
        parkingSpaces = order;
        std::random_shuffle(parkingSpaces.begin(), parkingSpaces.end());
    }

    void drawParkingSpaces() {
        SDL_SetRenderDrawColor(renderer, 255, 255, 255, 255); // Set color to white
        SDL_RenderClear(renderer);

        int spaceWidth = WINDOW_WIDTH / parkingSpaces.size();

        for (size_t i = 0; i < parkingSpaces.size(); ++i) {
            SDL_Rect spaceRect = {static_cast<int>(i * spaceWidth), 0, spaceWidth, WINDOW_HEIGHT};
            SDL_RenderDrawRect(renderer, &spaceRect);

            // Draw the car graphic
            drawText(parkingSpaces[i].graphic, spaceRect.x + spaceWidth / 2 - 20, WINDOW_HEIGHT / 2 - 20);
        }

        SDL_RenderPresent(renderer);
    }

    void drawText(const std::string& text, int x, int y) {
        // Implementation of drawText remains the same as the previous example
    }

    void play() {
        SDL_Event event;

        do {
            while (SDL_PollEvent(&event) != 0) {
                if (event.type == SDL_QUIT) {
                    return;
                }
            }

            drawParkingSpaces();
            SDL_Delay(1000); // Delay to visualize the parking spaces

            // Simulate some gameplay logic here

        } while (!checkWin());

        std::cout << "Congratulations! You parked the cars in the correct order.\n";
        SDL_Delay(2000); // Delay to show the congratulations message
    }

    bool checkWin() {
        return parkingSpaces == correctOrder;
    }
};

int main() {
    if (SDL_Init(SDL_INIT_VIDEO) < 0) {
        std::cerr << "SDL initialization failed: " << SDL_GetError() << std::endl;
        return -1;
    }

    window = SDL_CreateWindow("Parking Order Game", SDL_WINDOWPOS_UNDEFINED, SDL_WINDOWPOS_UNDEFINED,
                              WINDOW_WIDTH, WINDOW_HEIGHT, SDL_WINDOW_SHOWN);
    if (window == nullptr) {
        std::cerr << "Window creation failed: " << SDL_GetError() << std::endl;
        return -1;
    }

    renderer = SDL_CreateRenderer(window, -1, SDL_RENDERER_ACCELERATED);
    if (renderer == nullptr) {
        std::cerr << "Renderer creation failed: " << SDL_GetError() << std::endl;
        return -1;
    }

    // Define car graphics using ASCII art
    Car carA = {"Car A", R"(
    __
   [##|
=====-'
)"};
    Car carB = {"Car B", R"(
    __
   [##|
=====-'
)"};
    Car carC = {"Car C", R"(
    __
   [##|
=====-'
)"};
    Car carD = {"Car D", R"(
    __
   [##|
=====-'
)"};

    ParkingOrderGame game({carA, carB, carC, carD});
    game.play();

    SDL_DestroyRenderer(renderer);
    SDL_DestroyWindow(window);
    SDL_Quit();

    return 0;
}
