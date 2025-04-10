// Parking Order Game C++ :

#include <iostream>
#include <vector>
#include <algorithm>

class ParkingOrderGame {
private:
    std::vector<std::string> parkingSpaces;
    std::vector<std::string> correctOrder;

public:
    ParkingOrderGame(const std::vector<std::string>& order) : correctOrder(order) {
        // Initialize parking spaces randomly
        parkingSpaces = order;
        std::random_shuffle(parkingSpaces.begin(), parkingSpaces.end());
    }

    void displayParkingSpaces() {
        std::cout << "Current Parking Spaces: ";
        for (const auto& space : parkingSpaces) {
            std::cout << space << " ";
        }
        std::cout << "\n";
    }

    bool checkWin() {
        return parkingSpaces == correctOrder;
    }

    void play() {
        std::cout << "Welcome to the Parking Order Game!\n";
        displayParkingSpaces();

        do {
            std::cout << "Enter the index of the space you want to move: ";
            int selectedIndex;
            std::cin >> selectedIndex;

            if (selectedIndex >= 0 && selectedIndex < parkingSpaces.size()) {
                std::swap(parkingSpaces[selectedIndex], parkingSpaces[(selectedIndex + 1) % parkingSpaces.size()]);
                displayParkingSpaces();
            } else {
                std::cout << "Invalid index. Try again.\n";
            }

        } while (!checkWin());

        std::cout << "Congratulations! You parked the cars in the correct order.\n";
    }
};

int main() {
    std::vector<std::string> correctOrder = {"A", "B", "C", "D"};
    ParkingOrderGame game(correctOrder);
    game.play();

    return 0;
}

