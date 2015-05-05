Feature: Guest can create a restaurant
  In order to be able to make a request for dinner
  As a guest
  I need to be able to create a restaurant

  Scenario: Successfully creating a restaurant with a name
    Given I am a guest
    When I create the "Odessa" restaurant
    Then the "Odessa" restaurant should be saved

  Scenario: Being unable to create a project with too short name
    Given I am a guest
    When I create the "Od" restaurant
    Then the "Od" restaurant should not be saved