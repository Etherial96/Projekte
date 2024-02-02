package ampelpacket;

import javax.swing.*;

import javafx.animation.KeyFrame;
import javafx.animation.Timeline;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.geometry.Insets;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.BorderPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.paint.Color;
import javafx.scene.shape.Circle;
import javafx.scene.shape.Rectangle;
import javafx.stage.Stage;
import javafx.util.Duration;

public class AmpelApp extends Application {

    private Circle c1, c2, c3;
    private Timeline timer;

    public static void main(String[] args) {
        launch(args);
    }

    @Override
    public void start(Stage stage) throws Exception {
        stage.setTitle("Ampel");
        Pane Ampel = new Pane();

        HBox buttonLayout = new HBox();
        BorderPane grundbau = new BorderPane();

        grundbau.getChildren().add(buttonLayout);
        grundbau.getChildren().add(Ampel);

        c1 = new Circle();
        c1.setCenterX(220);
        c1.setCenterY(30);
        c1.setRadius(15);
        c1.setFill(Color.RED);
        c1.setStroke(Color.BLACK);

        c2 = new Circle();
        c2.setCenterX(220);
        c2.setCenterY(63);
        c2.setRadius(15);
        c2.setFill(Color.GREY);
        c2.setStroke(Color.BLACK);

        c3 = new Circle();
        c3.setCenterX(220);
        c3.setCenterY(96);
        c3.setRadius(15);
        c3.setFill(Color.GREY);
        c3.setStroke(Color.BLACK);

        Ampel.getChildren().addAll(c1, c2, c3);

        Button b1 = new Button("Weiter");
        Button b2 = new Button("Exit");

        buttonLayout.getChildren().addAll(b1, b2);
        grundbau.setLeft(b1);
        grundbau.setMargin(b1, new Insets(220, 0, 0, 150));
        grundbau.setRight(b2);
        grundbau.setMargin(b2, new Insets(220, 220, 0, 0));

        Rectangle viereck = new Rectangle();
        viereck.setX(184);
        viereck.setY(7);
        viereck.setWidth(70);
        viereck.setHeight(110);
        viereck.setFill(Color.LIGHTGREY);

        Ampel.getChildren().add(viereck);
        viereck.toBack();

        Scene scene = new Scene(grundbau, 500, 300, Color.GREY);
        stage.setScene(scene);
        stage.show();
        
        //Farbwechsel per Klick
        b1.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                handleButtonAction();
            }
        });

        b2.setOnAction(new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                Stage stage = (Stage) b2.getScene().getWindow();
                stage.close();
            }
        });

        //Timer zum wechseln der Farbe
        timer = new Timeline(new KeyFrame(Duration.seconds(2), new EventHandler<ActionEvent>() {
            @Override
            public void handle(ActionEvent event) {
                handleButtonAction();
            }
        }));
        timer.setCycleCount(Timeline.INDEFINITE);
        timer.play();
    }

    private void handleButtonAction() {
        if (c1.getFill() == Color.RED && c2.getFill() != Color.YELLOW) {
            c2.setFill(Color.YELLOW);
        } else if (c2.getFill() == Color.YELLOW && c1.getFill() == Color.RED) {
            c3.setFill(Color.GREEN);
            c1.setFill(Color.GREY);
            c2.setFill(Color.GREY);
        } else if (c3.getFill() == Color.GREEN) {
            c2.setFill(Color.YELLOW);
            c3.setFill(Color.GREY);
        } else if (c2.getFill() == Color.YELLOW && c3.getFill() == Color.GREY) {
            c1.setFill(Color.RED);
            c2.setFill(Color.GREY);
        }
    }

    public void stop() {
        // Stoppe den Timer, wenn das Programm beendet wird
        timer.stop();
    }
}
