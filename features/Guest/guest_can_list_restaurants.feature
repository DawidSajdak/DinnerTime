Feature: Guest can list restaurants
  In order to choose and order dinner
  As a guest
  I need to be able to see the list of all restaurants

  Scenario: Getting two restaurants if there are two
    Given I am a guest
    And There are 2 restaurants
    When I list restaurants
    Then I should get a list of 2 restaurants

  Scenario: Not getting any restaurant if there's none
    Given I am a guest
    But There are 0 restaurants
    When I list restaurants
    Then I should get an empty list of restaurants